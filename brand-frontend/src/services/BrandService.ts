import axios from '@/config/axios';
import type {BrandDto, QueryParams} from "@/interfaces/brands";
import useRequestQueryParams from "@/composables/useRequestQueryParams.ts";

export default {
  getList(params: QueryParams) {
    return axios.get(`/brands` + useRequestQueryParams(params));
  },


  create(brand: BrandDto) {
    return axios.post(`/brands`, brand);
  },

  get(id: number) {
    return axios.get(`/brands/${id}`);
  },

  update(brand: BrandDto) {
    return axios.put(`/brands/${brand.brand_id}`, brand);
  },

  delete(id: number) {
    return axios.delete(`/brands/${id}`);
  },
};
