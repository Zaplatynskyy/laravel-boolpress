import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Categories from "./pages/Categories";
import Tags from "./pages/Tags";
import SinglePost from "./pages/SinglePost";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/categories",
            name: "categories",
            component: Categories
        },
        {
            path: "/tags",
            name: "tags",
            component: Tags
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost
        }
    ]
});

export default router