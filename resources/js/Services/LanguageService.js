import axios from "axios";

const PREFIX = "/";
const changeLangAPI = (apiURL) => {
    return axios.get(PREFIX + apiURL);
}

export {
    changeLangAPI,
}
