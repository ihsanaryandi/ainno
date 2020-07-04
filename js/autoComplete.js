import { find, findAll } from './utils.js'

export default function autoComplete(elements) {

	for(let elementId in elements) {
		const trigger = find(`[data-autocomplete="#${elementId}"]`);
		
		if(!trigger) return

		const resultsInput = find(trigger.dataset.resultsInput)
		const resultsShow = find(trigger.dataset.resultsShow)


		trigger.addEventListener('keyup', (e) => {
			const autoCompleteElement = find(trigger.dataset.autocomplete)

			if(!trigger.value > 0) return autoCompleteElement.classList.remove('autocomplete-results-show') 
			
			autoCompleteElement.classList.add('autocomplete-results-show') 
		})

		trigger.addEventListener('blur', () => {
			setTimeout(() => find(trigger.dataset.autocomplete).classList.remove('autocomplete-results-show'), 200)
		})

		trigger.addEventListener('focus', () => {
			trigger.value.length > 0
				? find(trigger.dataset.autocomplete).classList.add('autocomplete-results-show')
				: find(trigger.dataset.autocomplete).classList.remove('autocomplete-results-show')
		})

		let results = []

		findAll(`.autocomplete${trigger.dataset.autocomplete} .result`, 'click', ({ el }) => { 
			trigger.value = ''
			results.push(el.dataset.value)
			
			renderResults(resultsInput, resultsShow, results)

			el.parentElement.classList.remove('autocomplete-results-show')
			elements[elementId]({ trigger, selected: el })
		})

		resultsShow.addEventListener('click', e => {
			if(e.target.hasAttribute('data-remove-result')) 
			{
				const el = e.target

				results.splice(
					results.findIndex(result => el.nextElementSibling.innerText === result), 
					1
				)

				renderResults(resultsInput, resultsShow, results)
			}
		})
	}
}

function renderResults(resultsInput, resultsShow, results) {
	if(resultsInput) {
		resultsInput.value = ''
		resultsInput.value = results.join(',')
	}

	if(resultsShow) {
		resultsShow.innerHTML = ''
		results.map(result => {
			resultsShow.innerHTML += 
				`<span class="badge badge-pill badge-light">
	                <span class="remove" data-remove-result>&times;</span>
	                <span>${result}</span>
	             </span>
	            `
		})
	}
}