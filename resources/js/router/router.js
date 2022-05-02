import { createRouter, createWebHashHistory } from "vue-router";

import Login from "../components/Auth/Login";
import Layout from "../components/Layout/Layout";
import Device from "../components/Device/Device";
const routes = [
    {
        path: "/login",
        component: Login,
    },
    {
        path: "/",
        component: Layout,
        children: [
            {
                path: "/device/:deviceId",
                component: Device
            }
        ]
    },
];

export default createRouter({
    history: createWebHashHistory(),
    routes,
});
