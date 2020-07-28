import { find, findAll } from './utils.js'
import autocomplete from './autoComplete.js'

autocomplete('[data-autocomplete="#skillsAutocomplete"]', {
	onInput: (input, setData) => {
		if(!input.length > 0) return
		
		setData([
			'Skill 1',
			'Skill 2',
			'Skill 3'
		]);
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

autocomplete('[data-autocomplete="#coFounderCitiesAutocomplete"]', {
	onInput: (input, setData) => {
		if(!input.length > 0) return
		
		setData([
			'Bandung',
			'Jakarta',
			'Solo'
		]);
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

autocomplete('[data-autocomplete="#citiesAutocomplete"]', {
	onInput: (input, setData) => {
		if(!input.length > 0) return
		
		setData([
			'Bandung',
			'Jakarta',
			'Solo'
		]);
	},

	onResultClick: (result, inputElement) => inputElement.value = result
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
