<template>
    <section id="tags">
        <div class="container">

            <ul>

                <li v-for="tag in tags" :key="tag.id">
                    <router-link :to="{ name: 'single-tag', params: { slug: tag.slug } }">
                        #{{tag.name}}
                    </router-link>  
                </li>
                
            </ul>

        </div>
    </section>
</template>

<script>
export default {
    name: 'Tags',

    data() {
        return {
            tags : []
        }
    },

    created() {
        axios.get('http://localhost:8000/api/tags')
            .then( (response) => {
                this.tags = response.data
            })
    }
}
</script>

<style lang="scss" scoped>

ul {
    text-align: center;
    list-style: none;

    li {
        cursor: pointer;
        padding: 10px 20px;
        margin: 20px 0;

        a {
            font-size: 1.2rem;
            color: white;
            text-decoration: none;

            &:hover {
                font-size: 1.3rem;
            }
        }
    }
}

</style>