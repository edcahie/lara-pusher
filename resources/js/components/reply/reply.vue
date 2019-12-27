<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <div class="headlin">{{ data.user}} </div>
                <div class="ml-2">said  {{ data.created_at}}</div>
            </v-card-title>

            <v-card-text v-html="data.reply"></v-card-text>
        </v-card>
    </div>
</template>

<script>
    export default {

        props: ['data']
    }
</script>

<style scoped>

</style>