import axios from "axios";

let Api = axios.create({
    baseURL: "http://localhost:3000/api",
    headers: {
        "Content-type": "application/json"
    }
});
Api.defaults.withCredentials = true;

export default Api;
