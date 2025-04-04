import axios from "axios";

const PREFIX = "/api/";
const getHousesAPI = (params) => {
    return axios.get(PREFIX + 'house', { params: params });
}

const validateStore = (data) => {
    return axios.post(PREFIX + 'house', data)
}

export {
    getHousesAPI,
    validateStore,
}
