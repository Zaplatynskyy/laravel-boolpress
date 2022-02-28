<template>
    <header>
        <img src="/img/external-content.duckduckgo.com.png" alt="boolpress logo">

        <ul>
            <li>
                <router-link :to="{ name: 'home' }">Home</router-link>
            </li>
            <li>
                <router-link :to="{ name: 'categories' }">Lista Categorie</router-link>
            </li>
            <li>
                <router-link :to="{ name: 'tags' }">Lista Tag</router-link>
            </li>
            <li>
                <a href="/admin/home">Area riservata</a>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name : 'Header'
}
</script>

<style lang="scss" scoped>

    header {
        width: 100%;
        height: 100px;
        background-color: #023047;
        box-shadow: 0px 3px 5px 0px #E2DCEA;
        opacity: .95;
        padding: 10px 100px;
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;

        img {
            height: 100%;
        }

        ul {
            list-style: none;

            li {
                display: inline-block;
                margin: 0 5px;

                a {
                    color: white;
                    text-decoration: none;
                    text-transform: uppercase;

                    &:hover {
                        color: #f57d00;
                    }
                }
            }
        }
    }

</style>