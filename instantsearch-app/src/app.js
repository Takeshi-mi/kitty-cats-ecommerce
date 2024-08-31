const { algoliasearch, instantsearch } = window;

const searchClient = algoliasearch(
  'BPNHSXL8NX',
  '778cc9f2e4968911f9117a295b3c506d'
);

const search = instantsearch({
  indexName: 'produtos',
  searchClient,
  future: { preserveSharedStateOnUnmount: true },
});

search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
  instantsearch.widgets.hits({
    container: '#hits',
    templates: {
      item: (hit, { html, components }) => html`
        <article>
          <div>
            <h1>${components.Highlight({ hit, attribute: 'nome' })}</h1>
            <p>${components.Highlight({ hit, attribute: 'descricao' })}</p>
            <p>${components.Highlight({ hit, attribute: 'preco' })}</p>
          </div>
        </article>
      `,
    },
  }),
  instantsearch.widgets.configure({
    hitsPerPage: 8,
  }),
  instantsearch.widgets.pagination({
    container: '#pagination',
  }),
]);

search.start();
