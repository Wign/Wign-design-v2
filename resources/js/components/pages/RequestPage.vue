<template>
    <div class="mb-8">
        <nav class="my-4">
            {{sortText}}
            <span v-for="(letter, index) in sortArray">
                <a v-on:click="sorting = index" class="cursor-pointer hover:text-turkis-dark"
                   :class="(sorting === index) ? 'font-bold' : ''"
                   v-text="letter"></a>
                <span v-if="index < 2"> | </span>
                <span v-if="index >= 2 && index < sortArray.length-1"> - </span>
            </span>
        </nav>

        <LoadingComponent v-if="$apollo.loading" class="my-5 mx-auto" size="double"></LoadingComponent>
        <div class="flex flex-row flex-wrap self-start -mx-2">
            <RequestComponent v-for="(request, index) in requestes" :key="request.id"
                              :request="request" :size="index < 3 ? 'lg' : 'md'"
                              :class="index < 3 ? 'w-1/3 px-2' : 'w-1/6 px-2'"></RequestComponent>
        </div>

        <a v-if="!seeAll" v-on:click="seeAll = true" class="w-1/3 mx-auto block mt-8 cursor-pointer">
            <turkis-button>{{seeAllText}}</turkis-button>
        </a>
    </div>
</template>

<script>
    import gql from 'graphql-tag';

    export default {
        props: ['sortText', 'requestText', 'alphaText', 'seeMoreText'],
        data: function () {
            return {
                perPage: 21,
                seeAll: false,
                sorting: 0,
                requestedWords: [],
                sortArray: [],
            }
        },
        apollo: {
            requestedWords: {
                query: gql`query requestedWords($sort: SortInput) {requestedWords(sort: $sort){literal,id,requesters_count,user_requested}}`,
                variables() {
                    return {
                        //first: this.perPage,
                        sort: this.sortering,
                    }
                }
            }
        },
        mounted() {
            if (localStorage.sorting) {
                this.sorting = localStorage.sorting;
            }
            let array = [this.requestText, this.alphaText, '0-9'];
            for (let i = 65; i <= 90; i++) {
                array.push(String.fromCharCode(i));
            }
            array.push('Æ', 'Ø', 'Å');
            this.sortArray = array;
        },
        computed: {
            seeAllText: function () {
                return this.seeMoreText.replace(':count', this.requestedWords.length);
            },
            requestes: function () {
                return this.seeAll ? this.requestedWords : this.requestedWords.slice(0, this.perPage);
            },
            sortering: function () {
                switch (this.sorting) {
                    case 0:
                        return new sortData('requesters_count', 'DESC');
                    case 1:
                        return new sortData('literal', 'ASC');
                    case 2:
                        return new sortData('literal', 'ASC', 'literal', 'regexp', '^[0-9]+');
                    default:
                        return new sortData('literal', 'ASC', 'literal', 'LIKE', this.sortArray[this.sorting] + "%")
                }
            }
        }
    }

    class sortData {
        constructor(sortColumn, sortOrder, whereColumn, whereOperator, whereValue) {
            this.sortColumn = sortColumn;
            this.sortOrder = sortOrder;
            this.whereColumn = whereColumn;
            this.whereOperator = whereOperator;
            this.whereValue = whereValue;
        }
    }
</script>
