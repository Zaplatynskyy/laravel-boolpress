<template>
    <section id="posts">

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
                console.log(this.posts);
            })
    }
}
</script>

<style>

</style>