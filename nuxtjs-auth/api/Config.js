import axios from 'axios';

const api = axios.create({
    baseURL: 'http://192.168.15.6:8000/api/'
});

export default api;