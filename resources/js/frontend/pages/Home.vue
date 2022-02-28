<template>
    <section id="posts_list">
        <div class="container">

            <div class="post" v-for="post in posts" :key="post.id">
                <div class="info_post">
                    <router-link :to="{ name: 'single-post', params: {slug: post.slug} }">
                        <h2 class="title">{{post.title}}</h2>
                    </router-link>
                    <div class="date_published">{{datePost(post.updated_at)}}</div>
                </div>

                <div class="tags" v-if="post.tags">
                    <span v-for="tag in post.tags" :key="tag.id">#{{tag.name}}</span>
                </div>

                <div class="image">
                    <img :src="`storage/${post.image}`" :alt="post.title">
                </div>

                <div class="category" v-if="post.category">
                    {{post.category.name}}
                </div>

                <div class="post_content">{{post.content}}</div>
            </div>

        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',

    data() {
        return {
            posts : [] 
        }
    },

    created() {
        axios.get('http://localhost:8000/api/posts')
            .then( response => {
                this.posts = response.data;
            })
    },

    methods : {
        datePost(date) {
            const newDate = new Date(date);
            return newDate.getDate() +'-'+ newDate.getMonth() +'-'+ newDate.getFullYear()
        }
    }
}
</script>

<style lang="scss" scoped>

#posts_list {

    .post{
        background-color: #fff;
        border-radius: 20px;
        padding: 40px 80px;
        margin: 20px 0;

        .info_post {
            display: flex;
            justify-content: space-between;
            align-items: center;

            a {
                text-decoration: none;
            }
        }

        .tags {
            margin-bottom: 10px;

            span {
                margin-right: 5px;
            }
        }


        .image {
            width: 90%;
            margin: auto;

            img {
                width: 100%;
                border-radius: 5px;
            }
        }

        .category {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            background-color: yellow;
            border-radius: 15px;
            padding: 10px 20px;
            margin: 10px 0;
        }

        .post_content {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;

            margin-top: 10px;
        }
    }
}
</style>