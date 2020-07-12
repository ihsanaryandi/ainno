export function findAll(selector, event = null, callback) {
	const elements = document.querySelectorAll(selector)

	if(!elements) return

	if(event == null) {
		return elements
	}

	elements.forEach(el => {
		el.addEventListener(event, e => {
			callback({ e, el })
		})
	})
}

export function find(selector, event = null, callback) {
	const el = document.querySelector(selector)

	if(!el) return

	if(event == null) {
		return el
	}

	el.addEventListener(event, e => {
		callback({ e, el })
	})
}