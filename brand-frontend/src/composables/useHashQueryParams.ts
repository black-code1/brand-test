import md5 from 'md5'
import type { QueryParams } from '@/interfaces/common'
import useRequestQueryParams from './useRequestQueryParams'

export default (queryParams: QueryParams = {}) => {
  if (queryParams) {
    return <string>md5(useRequestQueryParams(queryParams))
  } else return null
}
