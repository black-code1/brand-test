import md5 from 'md5'
import useRequestQueryParams from './useRequestQueryParams'
import type {QueryParams} from "@/interfaces/brands";

export default (queryParams: QueryParams = {}) => {
  if (queryParams) {
    return <string>md5(useRequestQueryParams(queryParams))
  } else return null
}
