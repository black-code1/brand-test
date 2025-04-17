import type { QueryParams } from '@/interfaces/common'

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

  if (queryParams.includes?.length) {
    const includeString = queryParams.includes.join(',')
    query.push(`include=${includeString}`)
  }

  if (queryParams.sorts?.length) {
    const sortString = queryParams.sorts.join(',')
    query.push(`sort=${sortString}`)
  }
  if (queryParams.scope?.length) {
    const sortString = queryParams.scope
    query.push(`scope=${sortString}`)
  }
  if (queryParams.scope_id) query.push(`scope_id=${queryParams.scope_id}`)

  if (queryParams.application_id) query.push(`application_id=${queryParams.application_id}`)

  if (queryParams.with_operators) query.push(`with_operators=${queryParams.with_operators}`)

  if (queryParams.value) query.push(`value=${queryParams.value}`)

  const result = `?${query.join('&')}`

  return result === '?' ? '' : result
}
