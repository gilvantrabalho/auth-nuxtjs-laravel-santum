import api from '../Config.js';

export default {
    register: async function (data) {
        return await api.post('/user/register', data)
    },
};