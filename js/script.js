import { find, findAll } from './utils.js'
import autoComplete from './autoComplete.js'

// Auto Complete
let results = []

autoComplete('#cityAutocompleteInput', {
	onRemoveResult: (element, results) => {
		results.splice(
			results.findIndex(result => result === element.nextElementSibling.innerText),
			1
		)
		return results
	},

	onRenderResults: (resultsShowElement, results) => {
		resultsShowElement.innerHTML = ''

		results.forEach(result => {
			resultsShowElement.innerHTML += 
				`<span class="badge badge-pill badge-light" id="selectedCity">
                   <span class="remove" data-remove-result>&times;</span>
                   <span>${result}</span>
                 </span>`
		})
	}
})

// autoComplete('#cityAutocompleteInput', (value) => {
// 	results.push(value)

// 	updateInput(inputElement, results)
// 	renderResults(selectedCitiesElement, results)
// })

// selectedCitiesElement.addEventListener('click', e => {
// 	if(e.target.hasAttribute('data-remove-result')) {
// 		results.splice(
// 			results.findIndex(result => result === e.target.nextElementSibling.innerText),
// 			1
// 		)
// 		console.log(results)

// 		updateInput(inputElement, results)
// 		renderResults(selectedCitiesElement, results)
// 	}
// })

// function updateInput(inputElement, results) {
// 	inputElement.value = results.join(',')
// }

// function renderResults(parentElement, results) {
// 	parentElement.innerHTML = ''

// 	results.forEach(result => {
// 		parentElement.innerHTML += 
// 			`<span class="badge badge-pill badge-light">
//                <span class="remove" data-remove-result>&times;</span>
//                <span>${result}</span>
//              </span>`
// 	})
// }

// Answer Button
findAll('button#seeAnswer', 'click', ({ el }) => {
	el.classList.add('show')
	el.nextElementSibling.classList.add('show')
})


// CKEditor
if(typeof ClassicEditor !== 'undefined') {
	let editor;

	ClassicEditor
		.create(document.querySelector('#editor'), {
			removePlugins: ['Heading'],
	        toolbar: ['bold', 'italic', 'link', 'numberedList']
		})
		.then(classicEditor => editor = classicEditor)
		.catch(error => {
		    console.error(error);
		});

	find('#form', 'submit', ({ e }) => {
		e.preventDefault()

		const editorData = editor.getData()

		console.log(editorData)
	})
}
