import { find, findAll } from './utils.js'
import autocomplete from './autoComplete.js'

// Auto Complete
// autoComplete('#cityAutocompleteInput', {
// 	onRemoveResult: (element, results) => {
// 		results.splice(
// 			results.findIndex(result => result === element.nextElementSibling.innerText),
// 			1
// 		)
// 		return results
// 	},

// 	onRenderResults: (resultsShowElement, results) => {
// 		resultsShowElement.innerHTML = ''

// 		results.forEach(result => {
// 			resultsShowElement.innerHTML += 
// 				`<span class="badge badge-pill badge-light" id="selectedCity">
//                    <span class="remove" data-remove-result>&times;</span>
//                    <span>${result}</span>
//                  </span>`
// 		})
// 	}
// })

autocomplete('[data-autocomplete="#skillsAutocomplete"]', {
	onInput: (input, setData) => {
		if(!input.length > 0) return
			
		fetch(`https://jsonplaceholder.typicode.com/users`)
			.then(res => res.json())
			.then(data => {
				
				let newData = []
				data.forEach(user => newData.push(user.name))

				setData(newData)
			})
	},

	onRemoveResult: (element, resultsShowElement, results) => {
		results.splice(
			results.findIndex(result => result == element.nextElementSibling.innerText),
			1
		)

		resultsShowElement.innerHTML = ''

		results.forEach(result => {
			resultsShowElement.innerHTML += `
				<span class="badge badge-pill badge-light">
					<span class="remove" data-remove-result>&times;</span>
					<span>${result}</span>
				</span>
			`
		})

		return results
	},

	setRenderElements: (results) => {
		let elements = []

		results.forEach(result => {
			elements.push(`
				<span class="badge badge-pill badge-light">
					<span class="remove" data-remove-result>&times;</span>
					<span>${result}</span>
				</span>
			`) 
		})

		return elements
	}
})

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
