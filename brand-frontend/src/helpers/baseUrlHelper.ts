const protocol: string = import.meta.env.VITE_PROTOCOL ?? 'http';

function getBaseUrl() {
  const domain: string =
    import.meta.env.VITE_DOMAIN ?? 'localhost:8001';

  return `${protocol}://${domain}/api/`;
}

export const baseUrl = getBaseUrl();
