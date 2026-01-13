import axios from 'axios';

const appUrl = import.meta.env.VITE_API_URL;
const appPort = import.meta.env.VITE_API_PORT;
const apiPrefix = import.meta.env.VITE_API_PREFIX;
const apiVersion = import.meta.env.VITE_API_VERSION;

const baseAPIURL = () => {
    const port = !appPort ? '' : `:${appPort}`;
    const prefix = !apiPrefix ? '' : `${apiPrefix}/`;
    const version = !apiVersion ? '' : apiVersion;

    return `${appUrl}${port}${prefix}${version}`;
}

const instance = axios.create({
    baseURL: baseAPIURL(),
});

export default instance;
