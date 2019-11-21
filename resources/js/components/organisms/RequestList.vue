<template>
    <div>
        <LoadingComponent v-if="$apollo.loading" class="m-5" size="double"/>
        <RequestComponent v-for="request in requestedWords.data" :key="request.id" :literal="request.literal" />
    </div>
</template>

<script>
    import RequestComponent from "../atoms/RequestComponent";
    import gql from 'graphql-tag'
    export default {
        name: "RequestList.vue",
        props: ['numWords'],
        components: {RequestComponent},
        data: function () {
            return {
                requestedWords: [],
            }
        },
        apollo: {
            requestedWords: {
                query: gql`query requestedWords($first: Int!) {requestedWords(first: $first){data{literal,id}}}`,
                variables () {
                    return {
                        first: parseInt(this.numWords)
                    }
                }
            }
        }
    }
</script>
