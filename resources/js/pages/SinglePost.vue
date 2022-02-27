<template>
    <section class="single_post container">
        <div class="post">
            <div class="info_post">
                <h2 class="title">{{post.title}}</h2>
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
    </section>
</template>

<script>
export default {
    name: 'SinglePost',

    data() {
        return {
            post : {}
        }
    },

    created() {
        axios.get(`http://localhost:8000/api/posts/${this.$route.params.slug}`)
            .then( (response) => {
                this.post = response.data;
                console.log(this.post);
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

.post{
    background-color: #fff;
    border-radius: 20px;
    padding: 40px 80px;
    margin: 20px 0;

    .info_post {
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        margin-top: 10px;
    }
}

</style>