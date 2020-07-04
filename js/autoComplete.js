import { find, findAll } from './utils.js'

export default function autoComplete(inputSelector, { onRemoveResult, onRenderResults }) {
	let results = []

	const trigger = find(inputSelector)

	if(!trigger) return

	const autoCompleteElement = find(trigger.dataset.autocomplete)
	const resultsInputElement = find(trigger.dataset.resultsInput)
	const resultsShowElement = find(trigger.dataset.resultsShow)

	trigger.addEventListener('keyup', (e) => {
		if(!trigger.value > 0) return autoCompleteElement.classList.remove('autocomplete-results-show') 
		autoCompleteElement.classList.add('autocomplete-results-show') 
	})

	trigger.addEventListener('focus', () => {
		trigger.value.length > 0
			? autoCompleteElement.classList.add('autocomplete-results-show')
			: autoCompleteElement.classList.remove('autocomplete-results-show')
	})

	trigger.addEventListener('blur', () => {
		setTimeout(() => autoCompleteElement.classList.remove('autocomplete-results-show'), 200)
	})

	autoCompleteElement.querySelectorAll('.result').forEach(result => {
		result.addEventListener('click', function() {
			trigger.value = ''
			this.parentElement.classList.remove('autocomplete-results-show')
			results.push(this.dataset.value)

			if(resultsShowElement) {
				onRenderResults(resultsShowElement, results)
			}

			fillInputWithResults(resultsInputElement, results)
		})
	})

	if(resultsShowElement) {
		resultsShowElement.addEventListener('click', e => {
			if(e.target.hasAttribute('data-remove-result')) {
				results = onRemoveResult(e.target, results)
				onRenderResults(resultsShowElement, results)
				fillInputWithResults(resultsInputElement, results)
			}
		})
	}

}

function fillInputWithResults(resultsInput, results) {
	if(resultsInput) {
		resultsInput.value = ''
		resultsInput.value = results.join(',')
	}
}