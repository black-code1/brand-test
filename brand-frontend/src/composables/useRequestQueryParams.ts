import type {QueryParams} from "@/interfaces/brands";
export default (queryParams: QueryParams = {}): string => {
  const query: string[] = []

  if (queryParams.paginate) {
    query.push(`paginate=${queryParams.paginate}`)
    if (queryParams.page) query.push(`page=${queryParams.page}`)
  }

  if (queryParams.filters && Object.keys(queryParams.filters)?.length) {
    Object.entries(queryParams.filters).forEach(([key, value]) => {
      query.push(`filter[${key}]=${value}`)
    })
  }

  if (queryParams.value) query.push(`value=${queryParams.value}`)

  const result = `?${query.join('&')}`

  return result === '?' ? '' : result
}
