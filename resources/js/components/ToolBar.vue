<template>
    <div>
        <v-toolbar>
            <v-toolbar-title>Edcahie Single</v-toolbar-title>

            <v-spacer></v-spacer>

            <div class="hidden-sm-and-down ">
                <v-btn flat>Forum</v-btn>
                <v-btn flat>Ask a question</v-btn>
                <v-btn flat>Category</v-btn>

                <router-link to="/login">
                    <v-btn flat>Login</v-btn>
                </router-link>
            </div>

        </v-toolbar>
    </div>
</template>

<script>
    export default {
        name: "ToolBar"
    }
</script>

<style scoped>

</style>