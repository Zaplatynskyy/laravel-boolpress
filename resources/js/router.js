import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import Categories from "./pages/Categories";
import SingleCategory from "./pages/SingleCategory";
import Tags from "./pages/Tags";
import SingleTag from "./pages/SingleTag";
import SinglePost from "./pages/SinglePost";
import PageNotFound from "./pages/PageNotFound";

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
            path: "/categories/:slug",
            name: "single-category",
            component: SingleCategory
        },
        {
            path: "/tags",
            name: "tags",
            component: Tags
        },
        {
            path: "/tags/:slug",
            name: "single-tag",
            component: SingleTag
        },
        {
            path: "/posts/:slug",
            name: "single-post",
            component: SinglePost
        },
        {
            path: "*",
            name: "page-404",
            component: PageNotFound
        }
    ]
});

export default router