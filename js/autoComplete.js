import { find, findAll } from './utils.js'

// function autoComplete(inputSelector, { onInput, onRemoveResult, onRenderResults }) {
// 	let results = []
// 	let autoCompleteResults = []

// 	const trigger = find(inputSelector)

// 	if(!trigger) return

// 	const autoCompleteElement = find(trigger.dataset.autocomplete)
// 	const resultsInputElement = find(trigger.dataset.resultsInput)
// 	const resultsShowElement = find(trigger.dataset.resultsShow)

// 	const updateAutoCompleteData = (data) => {
// 		autoCompleteElement.innerHTML = ''

// 		data.forEach(d => {
// 			autoCompleteResults.push(`<div class="result" data-value="${d}">${d}</div>`)
// 		})

// 		autoCompleteResults.forEach(result => {
// 			autoCompleteElement.innerHTML += result
// 		})
// 	}

// 	trigger.addEventListener('keyup', async (e) => {
// 		if(!trigger.value > 0) return autoCompleteElement.classList.remove('autocomplete-results-show') 
		
// 		await onInput(e.target.value, updateAutoCompleteData)

// 		autoCompleteElement.classList.add('autocomplete-results-show') 
// 	})

// 	autoCompleteElement.addEventListener('click', e => {
// 		if(e.target.classList.contains('result')) 
// 		{
// 			e.target.addEventListener('click', function() {
// 				trigger.value = ''
// 				this.parentElement.classList.remove('autocomplete-results-show')
// 				results.push(this.dataset.value)

// 				if(resultsShowElement) {
// 					onRenderResults(resultsShowElement, results)
// 				}

// 				fillInputWithResults(resultsInputElement, results)

// 				// updateResults(autoCompleteElement, autoCompleteResults, results)
// 			})
// 		}
// 	})

// 	if(resultsShowElement) {
// 		resultsShowElement.addEventListener('click', e => {
// 			if(e.target.hasAttribute('data-remove-result')) {
// 				results = onRemoveResult(e.target, results)
// 				onRenderResults(resultsShowElement, results)
// 				// updateResults(autoCompleteElement, autoCompleteResults, results)
// 				fillInputWithResults(resultsInputElement, results)
// 			}
// 		})
// 	}

// }

// function fillInputWithResults(resultsInput, results) {
// 	if(resultsInput) {
// 		resultsInput.value = ''
// 		resultsInput.value = results.join(',')
// 	}
// }

// function updateResults(autoCompleteElement, resultElements, results) {
// 	let elements
	
// 	autoCompleteElement.innerHTML = ''

// 	resultElements.forEach(el => {
// 		if(!results.includes(el.dataset.value)) {
// 			autoCompleteElement.appendChild(el)
// 		}
// 	})
// }















export default function autocomplete(selector, { onInput, onRemoveResult, setRenderElements }) {
	let results = []

	const inputElement = find(selector)
	
	const autoCompleteElement = find(inputElement.dataset.autocomplete)
	const resultsShowElement = find(inputElement.dataset.resultsShow)
	const resultsInputElement = find(inputElement.dataset.resultsInput)

	const renderResults = (results) => {
		resultsShowElement.innerHTML = ''

		results.forEach(result => {
			switch(typeof result) {
				case 'object' :
					resultsShowElement.appendChild(result)
				case 'string' :
					resultsShowElement.innerHTML += result
			}
		})
	}

	const setInputValue = (results) => {
		resultsInputElement.value = results.join(',')
	}

	const setData = (data) => {
		autoCompleteElement.innerHTML = ''

		if(data === false || data.length < 1 || data === null) 
		{
			return autoCompleteElement.innerHTML = '<div class="no-results"><strong>Tidak ada hasil</strong></div>'
		}

		data.forEach(d => autoCompleteElement.innerHTML += `<div class="result" data-value="${d}">${d}</div>`)
	}


	inputElement.addEventListener('keyup', async e => {
		if(!inputElement.value.length > 0) return autoCompleteElement.classList.remove('autocomplete-results-show')
		
		await onInput(inputElement.value, setData)

		autoCompleteElement.classList.add('autocomplete-results-show')
	})

	autoCompleteElement.addEventListener('click', e => {
		if(!e.target.classList.contains('result')) return

		results.push(e.target.dataset.value)

		setInputValue(results)

		const elements = setRenderElements(results)

		renderResults(elements)

		autoCompleteElement.classList.remove('autocomplete-results-show')
	})

	resultsShowElement.addEventListener('click', e => {
		if(e.target.hasAttribute('data-remove-result')) {
			results = onRemoveResult(e.target, resultsShowElement, results)
			setInputValue(results)
		}
	})
} 




















