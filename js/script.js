import { find, findAll } from './utils.js'
import autoComplete from './autoComplete.js'

// Auto Complete
autoComplete({
	skillResults: ({ trigger, selected }) => {
		
	},

	cityResults: () => {
		
	}
})

function renderResults(results) {

}

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
