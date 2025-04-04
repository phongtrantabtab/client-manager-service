import axios from "axios";

const PREFIX = "/api/";
const getAddressAPI = () => {
     return axios.get(PREFIX + 'address', { withCredentials: true });
}

export {
    getAddressAPI,
}
