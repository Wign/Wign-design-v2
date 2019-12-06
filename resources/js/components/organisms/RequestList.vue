<template>
    <div>
        <LoadingComponent v-if="$apollo.loading" class="m-5" size="double"></LoadingComponent>
        <RequestButton v-for="request in requestedWords" :key="request.id" :literal="request.literal" class="mx-1"></RequestButton>
    </div>
</template>

<script>
    import gql from 'graphql-tag';
    export default {
        name: "RequestList.vue",
        props: ['numWords'],
        data: function () {
            return {
                requestedWords: [],
            }
        },
        apollo: {
            requestedWords: {
                query: gql`query requestedWords($first: Int!) {requestedWords(first: $first){literal,id}}`,
                variables () {
                    return {
                        first: parseInt(this.numWords)
                    }
                }
            }
        }
    }
</script>
