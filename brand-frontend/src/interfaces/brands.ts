export type Nullable<T> = T | null;
export interface Brand extends Entity {
  brand_name: string,
  brand_image: string,
  rating: number,
  iso_3166_2: string,
}

export interface Entity {
  brand_id: Nullable<number>;
  created_at?: Nullable<string>;
  updated_at?: Nullable<string>;
}


export interface QueryParams {
  page?: number;
  paginate?: number;
  filters?: never;
  includes?: string[];
  sorts?: string[];
  scope?: string;
  scope_id?: number;
  reload?: boolean;
  value?: string;
}

export interface Meta {
  current_page: number
  from: number
  last_page: number
  links: []
  path: string
  per_page: number
  to: number
  total: number
}

export type BrandDto = Partial<{brand_id: number, brand_name: string, brand_image: string, rating: number, iso_3166_2: string}>

