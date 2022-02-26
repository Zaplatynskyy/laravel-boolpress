import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Posts from "./pages/Posts";
import Categories from "./pages/Categories";
import Tags from "./pages/Tags";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/posts",
            name: "posts",
            component: Posts
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
        }
    ]
});

export default router