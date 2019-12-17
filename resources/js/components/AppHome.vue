<template>

    <div>
        <toolBar></toolBar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>

</template>

<script>

    import toolBar from "./ToolBar";
    import AppFooter from "./AppFooter";
    import Login from "./login/Login";

    export default {
        components: {toolBar, AppFooter, Login},
        mounted() {

            console.log('Home mounted')
        }

    }
</script>

<style>
</style>