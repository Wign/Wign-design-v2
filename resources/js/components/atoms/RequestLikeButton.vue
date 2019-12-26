<template>
    <button class="cursor-pointer" v-on:click.prevent="togglLike">{{countRequested}} <fa-icon :icon="[iconStyle, 'hand-point-up']"></fa-icon>
    </button>
</template>

<script>
    import gql from 'graphql-tag';

    export default {
        props: ['wordId', 'countRequested', 'isRequested'],
        data: function() {
            return {
                counter: this.countRequested,
                requested: this.isRequested
            }
        },
        computed: {
            iconStyle: function () {
                return this.isRequested ? 'fas' : 'far';
            }
        },
        methods: {
            togglLike() {
                this.$apollo.mutate({
                    mutation: gql`mutation ($wordId: ID!) {
                        toggleRequest(wordId: $wordId) {
                            id
                            requesters_count
                            user_requested
                        }
                    }`,
                    variables: {
                        wordId: this.wordId
                    },
                    update: (store, { data: { toggleRequest } }) => {
                        this.counter = toggleRequest.requesters_count;
                        this.requested = toggleRequest.user_requested;
                    },
                    optimisticResponse: {
                        __typename: 'Mutation',
                        toggleRequest: {
                            __typename: 'Word',
                            id: this.wordId,
                            requesters_count: this.isRequested ? this.countRequested - 1 : this.countRequested + 1,
                            user_requested: !this.isRequested
                        }
                    }
                })
            }
        }
    }
</script>
