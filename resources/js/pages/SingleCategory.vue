<template>
    <section class="single_category">
        <div class="container">
            <div class="category">
                {{category.name}}
            </div>  

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
            category : {},
            posts : []
        }
    },

    created() {
        axios.get(`http://localhost:8000/api/categories/${this.$route.params.slug}`)
            .then( (response) => {
                this.category = response.data.categories;
                this.posts = response.data.posts;
            }).catch( ()=> {
                // handle error
                this.$router.push({name: "page-404"})
            })
    }
}
</script>

<style lang="scss" scoped>

.category {
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
    background-color: yellow;
    border-radius: 15px;
    padding: 10px 20px;
    margin: 10px 0;
}

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

</style>