import axios from 'axios';
import { createToast } from 'mosha-vue-toastify';
import { baseUrl } from '@/helpers/baseUrlHelper';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axios.defaults.baseURL = baseUrl;

axios.interceptors.request.use(
  function (config) {

    config.headers['CF-IPCountry'] = import.meta.env.VITE_DEFAULT_CF_IP_COUNTRY ?? 'CM';
    config.params = { ...config.params };
    return config;
  },
  function (error) {
    return Promise.reject(error);
  }
);

axios.interceptors.response.use(
  function (response) {
    const messageType =
      response.status >= 200 && response.status < 400 ? 'success' : 'danger';
    if (response.data.message) {
      createToast(response.data.message, {
        type: messageType,
        showIcon: true,
      });
    }

    return response;
  },
  function (error) {
    if (error.response?.data?.message) {
      createToast(error.response.data.message, {
        type: 'danger',
        showIcon: true,
      });
    }
    return Promise.reject(error);
  }
);

export default axios;
