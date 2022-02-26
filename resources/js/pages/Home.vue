<template>
    <section id="posts_list">
        <div class="container">

            <div class="post" v-for="post in posts" :key="post.id">
                <div class="info_post">
                    <h2 class="title">{{post.title}}</h2>
                    <div class="date_published">{{datePost(post.updated_at)}}</div>
                </div>

                <img :src="`storage/${post.image}`" alt="">

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
        // padding: 20px 0;
        text-align: center;
        background-color: #fff;
        border-radius: 20px;
        padding: 40px 80px;
        margin: 20px 0;

        .info_post {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        img {
            width: 100%;
            border-radius: 5px;
            margin: 20px 0;
        }
    }
}
</style>