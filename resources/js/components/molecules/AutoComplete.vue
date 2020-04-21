<template>
  <ais-instant-search
    index-name="words_index"
    :search-client="searchClient" 
    >
    <ais-configure
        :hitsPerPage=countHits
        :restrictSearchableAttributes="['literal']"
      />
    <!-- Widgets -->
    <ais-autocomplete>
  <template slot-scope="{ currentRefinement, indices, refine }">
    <vue-autosuggest
            :value="currentRefinement"
            :suggestions="indicesToSuggestions(indices)"
            @selected="onSelect"
            @input="refine"
            :input-props="{
              style: 'width: 100%',
              onInputChange: refine,
              placeholder: 'Søg her…',
            }"
          >
            <template slot-scope="{ suggestion }">
              <ais-highlight
                :hit="suggestion.item"
                attribute="literal"
                v-if="suggestion.item.literal"
              />
            </template>
          </vue-autosuggest>
        </template>
</ais-autocomplete>
  </ais-instant-search>
</template>

<script>
  import algoliasearch from 'algoliasearch/lite';
  import 'instantsearch.css/themes/algolia-min.css';
  import { VueAutosuggest } from 'vue-autosuggest';

  export default {
    props: ['countHits'],
    components: { VueAutosuggest },
    data() {
      return {
        searchClient: algoliasearch(
          '73CSBFD8PH',
          '9189296e64bf2e31d73df07b16e0efdd'
        ),
        query: '',
      };
    },
    methods: {
    onSelect(selected) {
      if (selected) {
        this.query = selected.item.literal;
      }
    },
    indicesToSuggestions(indices) {
      return indices.map(({ hits }) => ({ data: hits }));
    },
  },
  };
</script>

<style>
  .ais-Highlight-highlighted {
  background: cyan;
  font-style: normal;
}

#autosuggest input {
  font: inherit;
}
.autosuggest__results-container {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
.autosuggest__results-container ul {
  margin: 0;
  padding: 0;
}
.autosuggest__results_item {
  border-bottom: 1px solid rgba(0, 0, 0, 0.12);
  list-style-type: none;
  padding: 0.5em;
  display: grid;
  grid-template-columns: 5fr 1fr 1fr;
  align-items: center;
  justify-content: space-between;
}
.autosuggest__results_item img {
  height: 3em;
}
.autosuggest__results_item-highlighted {
  background-color: rgba(0, 0, 0, 0.24);
}
.ais-Hits-item img {
  max-width: 100%;
}

</style>
