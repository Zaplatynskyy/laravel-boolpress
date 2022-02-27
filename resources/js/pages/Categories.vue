<template>
    <section id="categories">
        <div class="container">

            <ul>

                <li v-for="category in categories" :key="category.id">
                    <router-link :to="{ name: 'single-category', params: { slug: category.slug } }">
                         {{category.name}}
                    </router-link>  
                </li>
                
            </ul>

        </div>
    </section>
</template>

<script>
export default {
    name : 'Categories',

    data() {
        return {
            categories : []
        }
    },

    created() {
        axios.get('http://localhost:8000/api/categories')
            .then( (response) => {
                this.categories = response.data
            })
    }
}
</script>

<style lang="scss" scoped>

ul {
    list-style: none;

    li {
        text-align: center;
        font-weight: bold;
        text-transform: uppercase;
        background-color: yellow;
        border-radius: 15px;
        cursor: pointer;
        padding: 10px 20px;
        margin: 20px 0;

        a {
            text-decoration: none;
        }
    }
}

</style>