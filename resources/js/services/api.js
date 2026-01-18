import axios from 'axios';
import ERROR_MESSAGES from '@js/services/customErrors.js';

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

instance.interceptors.response.use(
    (response) => response,
    (error) => {
        let message = ERROR_MESSAGES.GENERIC_ERROR;

        if (error.response) {
            const { status, data } = error.response;

            if (data && data.message) {
                message = data.message;
            } else {
                message = ERROR_MESSAGES[status] || ERROR_MESSAGES.GENERIC_ERROR;
            }
        } else {
            message = ERROR_MESSAGES.NETWORK_ERROR;
        }

        console.warn(error);
        return Promise.reject(new Error(message));
    }
);

export default instance;
