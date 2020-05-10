class Head {
	constructor(_isLogin, _name, _parent, _num) {
		this.headCon = this.createHeadCon(_isLogin, _name, _parent, _num);

	}

	createHeadCon(_isLogin, _name, _parent, _num) {
		let oDiv = document.createElement('div');
		Object.assign(oDiv.style, {
			width: "100%",
			height: "2.4rem",
			backgroundColor: "rgb(42, 74, 124)",
			display: "flex",
			flexDirection: "row",
			alignItems: "center",
			justifyContent: "space-between",
			padding: "0 2.8rem"
		});

		let img = new Image();
		img.src = "/fishClub/Public/img/home/bg-fish.jpg";
		Object.assign(img.style, {
			width: "5rem",
			height: "1.8rem"
		})
		oDiv.appendChild(img);

		let rightCon = document.createElement("div");
		Object.assign(rightCon.style, {
			width: "3rem",
			height: "0.7rem",
			display: "flex",
			flexDirection: "column",
			justifyContent: "space-between",
			color: "#FFFFFF"
		})

		let rTopCon = document.createElement('div');
		rTopCon.style.width = "100%";
		rTopCon.style.fontSize = "0.14rem";

		let yearSpan = document.createElement('span');
		yearSpan.textContent = "Since 2020";
		yearSpan.style.marginRight = "0.1rem";
		rTopCon.appendChild(yearSpan);

		if(!_isLogin) {
			let sign = document.createElement('a');
			sign.textContent = "Sign in";
			sign.href = "../Login/login.html"
			sign.style.fontWeight = "bolder";
			sign.style.color = "#FFFFFF";
			sign.style.marginRight = "0.1rem";
			rTopCon.appendChild(sign);

			let orSpan = document.createElement('span');
			orSpan.textContent = "or";
			orSpan.style.marginRight = "0.1rem";
			rTopCon.appendChild(orSpan);

			let create = document.createElement('a');
			create.textContent = "Create an Account";
			create.href = "../Login/register.html";
			create.style.fontWeight = "bolder";
			create.style.color = "#FFFFFF";
			rTopCon.appendChild(create);
		} else {
			let logSpan = document.createElement('span');
			logSpan.textContent = "Logged in as";
			rTopCon.appendChild(logSpan);

			let name = document.createElement('a');
			name.textContent = " " + _name;
			name.href = "../Main/myOrder.html";
			name.style.marginRight = "0.1rem";
			name.style.fontWeight = "bolder";
			name.style.color = "#FFFFFF";
			rTopCon.appendChild(name);

			let logOut = document.createElement('a');
			logOut.textContent = "Log out";
			logOut.style.fontWeight = "bolder";
			logOut.style.color = "#FFFFFF";
			logOut.addEventListener('click', this.logOut);
			rTopCon.appendChild(logOut);
		}
		rightCon.appendChild(rTopCon);

		let bottomCon = document.createElement('div');
		Object.assign(bottomCon.style, {
			width: "100%",
			display: "flex",
			flexDirection: "row",
			color: "#FFFFFF",
			fontSize: "0.14rem",
		})

		let contactBtn = document.createElement('input');
		contactBtn.type = "button";
		contactBtn.value = "Contact us";
		contactBtn.style.backgroundColor = "rgb(37, 65, 109)";
		contactBtn.style.border = "none";
		contactBtn.style.width = "1.1rem";
		contactBtn.style.height = "0.36rem";
		contactBtn.style.marginRight = "0.4rem";
		contactBtn.addEventListener('click', this.toContact);
		bottomCon.appendChild(contactBtn);

		let carDiv = document.createElement('div');
		Object.assign(carDiv.style, {
			width: "1.1rem",
			height: "0.36rem",
			backgroundColor: "rgb(37, 65, 109)",
			display: "flex",
			flexDirection: "row",
			alignItems: "center",
			justifyContent: "center",
			cursor: "pointer",
			position: "relative"

		})
		carDiv.addEventListener('click', this.toOrder);
		let cartImg = new Image();
		cartImg.src = "/fishClub/Public/img/home/car.png";
		cartImg.style.width = "0.2rem";
		cartImg.style.height = "0.2rem";
		cartImg.style.marginRight = "0.1rem";
		carDiv.appendChild(cartImg);

		let cartSpan = document.createElement('span');
		cartSpan.textContent = "Cart";
		carDiv.appendChild(cartSpan);
		bottomCon.appendChild(carDiv);

		if(_isLogin && _num > 0) {
			let numIn = document.createElement('input');
			numIn.value = _num;
			Object.assign(numIn.style, {
				width: "0.2rem",
				height: "0.2rem",
				backgroundColor: "rgb(252, 234, 79)",
				textAlign: "center",
				position: "absolute",
				color: "rgb(42,74,124)",
				top: "-0.05rem",
				right: "-0.05rem",
				border:"none",
				borderRadius:"0.1rem"
			})
			carDiv.appendChild(numIn);
		}

		rightCon.appendChild(bottomCon);
		oDiv.appendChild(rightCon);

		_parent.insertBefore(oDiv, _parent.firstElementChild);
		return oDiv;

	}

	createDom(type, parent = document.body, styleList) {
		let elem = document.createElem(type);
		for(let prop in styleList) {
			elem.style[prop] = styleList[prop];
			parent.appendChild(elem);
			return elem;
		}
	}

	logOut() {
		$.ajax({
			data: '',
			type: "POST",
			dataType: "JSON",
			url: '../Main/logout',
			success: function(data) {
				if(data.state == true) {
					window.location.href = "../Main/index.html";
				} else {
					layer.alert(data.info, {
						icon: 5,
						btn: ['OK'],
						title: 'INFORMATION'
					});
				}
			}
		});
	}

	toContact() {
		layer.open({
			type: 2,
			title: 'Contact us',
			maxmin: true,
			shadeClose: true, //点击遮罩关闭层
			area: ['50%', '28%'],
			content: '../Main/contactUs',
			end: function() {}
		});
	}

	toOrder() {
		window.location.href = "../OrderDetail/orderDetail.html";
	}

}