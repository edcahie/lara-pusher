<template>
    <V-container>
     <form @submit.prevent="login">
            <v-text-field
                    v-model="form.email"
                    label="Email">

            </v-text-field>
            <v-text-field
                    v-model="form.password"
                    label="Password" type="password">

            </v-text-field>



            <v-btn color="green" type="submit" >Login</v-btn>
        </form>
    </V-container>
</template>

<script>


    export default {

        data() {

            return {

                form : {

                    email:null,
                    password:null
                }
        }
        },
        methods: {

            login(){

                User.login(this.form)
            }
        }
    }
</script>

<style scoped>

</style>