import { defineStore } from 'pinia';
import {useSessionStorage} from "@vueuse/core";
import type {Brand, BrandDto, Meta, Nullable, QueryParams} from "@/interfaces/brands";
import useHashQueryParams from "@/composables/useHashQueryParams";
import BrandService from "@/services/BrandService";

type CountryState = {
  brandList: Brand[];
  brand: Nullable<Brand>;
  requestQueryHash: Nullable<string>;
  meta: Nullable<Meta>;
};

export const useBrandStore = defineStore('brand', {
  state: (): CountryState => {
    return {
      brandList: useSessionStorage<Brand[]>('brands', []).value,
      brand: null,
      requestQueryHash: useSessionStorage<string>('brands-hash', '').value,
      meta: null,
    };
  },
  getters: {
  },
  actions: {
    getList(params: QueryParams = {}) {
      const hashParams = params.reload ? null : useHashQueryParams(params);
      if (
        !params.reload &&
        this.brandList.length > 0 &&
        hashParams == this.requestQueryHash
      )
        return Promise.resolve<Brand[]>(this.brandList);
      else {
        return BrandService.getList(params).then((response) => {
          this.brandList = response.data.data as Array<Brand>;
          this.meta = response.data.meta;
          this.requestQueryHash = hashParams;
          return response.data.data;
        }) as Promise<Brand[]>;
      }
    },
    update(brandField: BrandDto) {
      return BrandService.update(brandField).then(({ data }) => {
        const brand = data.data as Brand;
        this.brandList = this.brandList.map((old) => {
          return old.brand_id === brand.brand_id ? brand : old;
        });
        return brand;
      }) as Promise<Brand>;
    },
    add(brandField: BrandDto) {
      return BrandService.create(brandField).then(({ data }) => {
        if (data) {
          this.brandList.push(data.data);
          if (this.meta) {
            this.meta.total++;
          }
          return data.data;
        }
      }) as Promise<Brand>;
    },
  },
});
