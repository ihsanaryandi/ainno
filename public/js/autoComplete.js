import { find, findAll } from './utils.js'

export default function autocomplete(selector, { onInput, onRemoveResult, setRenderElements = null, onResultClick }) {
	let results = []

	const inputElement = find(selector)

	if(!inputElement) return
	
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
		resultsInputElement.value = results.join('|')
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

		if(resultsInputElement) setInputValue(results);

		const elements = (typeof setRenderElements === 'function') ? setRenderElements(results) : []

		if(resultsShowElement) renderResults(elements);

		autoCompleteElement.classList.remove('autocomplete-results-show')
		inputElement.value = '';
		
		if(typeof onResultClick === 'function') onResultClick(e.target.dataset.value, inputElement); 
	})

	if(resultsShowElement) {
		resultsShowElement.addEventListener('click', e => {
			if(e.target.hasAttribute('data-remove-result')) {
				results = onRemoveResult(e.target, resultsShowElement, results)
				setInputValue(results)
			}
		})
	}
} 




















