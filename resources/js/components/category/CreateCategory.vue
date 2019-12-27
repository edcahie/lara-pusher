<template>

    <v-container>

        <v-form @submit.prevent="submit">

            <v-text-field
                    label="Name"
                    v-model="form.name"
                    type="text"
                    required
            ></v-text-field>

            <v-btn color="red" type="submit" v-if="editSlug">Update</v-btn>
            <v-btn color="green" type="submit" v-else>Create</v-btn>

        </v-form>

        <v-card>
            <v-toolbar color="indigo" dark dense>
                <v-toolbar-title>Categories</v-toolbar-title>
            </v-toolbar>


            <v-list>

                <div v-for="(category,index) in categories" :key="category.id">


                <v-list-tile >

                        <v-list-tile-action>
                            <v-btn icon small @click="edit(index)">
                                <v-icon color="orange" >edit</v-icon>
                            </v-btn>
                        </v-list-tile-action>

                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ category.name }}
                            </v-list-tile-title>
                        </v-list-tile-content>

                        <v-list-tile-action>
                            <v-btn icon small @click="destroy(category.slug, index)">
                                <v-icon color="red" >delete</v-icon>
                            </v-btn>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-divider></v-divider>

                </div>

            </v-list>
        </v-card>
    </v-container>

</template>

<script>
    export default {

        data(){

            return {

                form: {
                    name:null

                },
                categories: {},
                editSlug: null
            }
        },
        created() {

            if(!User.admin()){

                this.$router.push('/forum')

            }

            axios.get('api/category')
                .then(res => this.categories = res.data.data)
        },
        methods : {

            submit(){

                this.editSlug ? this.update() : this.create() ;

            },
            update(){

                axios.patch(`/api/category/${this.editSlug}`, this.form)
                    .then(res => {
                        this.categories.unshift(res.data);
                        this.form.name= null ;
                    })
            },
            create(){

                axios.post('/api/category', this.form)
                    .then(res => {
                        this.categories.unshift(res.data);
                        this.form.name= null ;
                    })
            },
            destroy(slug, index){

                    axios.delete(`/api/category/${slug}`)
                    .then(res =>this.categories.splice(index, 1));
            },
            edit(index){
               // this.form.name = name;
                  this.form.name = this.categories[index].name;
                  this.editSlug = this.categories[index].slug;
                  this.categories.splice(index, 1);

            }


        }
    }
</script>

<style scoped>

</style>