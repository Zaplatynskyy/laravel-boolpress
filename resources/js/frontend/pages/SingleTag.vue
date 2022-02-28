<template>
    <section class="single_tag">
        <div class="container">
            <h1>#{{tag.name}}</h1>

            <div class="post_associati">
                <ul>
                    <li v-for="post in posts" :key="post.id">
                        <router-link :to="{ name: 'single-post', params: {slug: post.slug} }">
                            <h2 class="title">{{post.title}}</h2>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name : 'SingleCategory',

    data() {
        return {
            tag : {},
            posts : []
        }
    },

    created() {
        axios.get(`http://localhost:8000/api/tags/${this.$route.params.slug}`)
            .then( (response) => {
                this.tag = response.data.categories;
                this.posts = response.data.posts;
            }).catch( ()=> {
                // handle error
                this.$router.push({name: "page-404"})
            })
    }
}
</script>

<style lang="scss" scoped>

.container {
    color: white;
    text-align: center;

    .post_associati {
        ul {
            list-style: none;
            text-align: center;
            margin-top: 20px;

            a {
                color: white;
                text-decoration: none;

                &:hover {
                    color: yellow;
                }
            }
        }
    }
}

</style>