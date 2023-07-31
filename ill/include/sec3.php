<div class="container4">
  <div class="box4">
    <h1 class="title4">タイトルが入ります</h1>
    <p class="description4">親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降り<br><br>小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張って</p>
  </div>

  <div class="accordion">
		<div class="accordion-item">
			<div class="accordion-header">
				<div class="box5">
				<span class="price">¥ 1,980</span><span class="unit">/月</span>
				</div>
				<div class="circle">
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
				</div>
			</div>
			<div class="accordion-content">
				<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
			</div>
		</div>
		<div class="accordion-item">
			<div class="accordion-header">
			<div class="box5">
				<span class="price">¥ 2,540</span><span class="unit">/月</span>
				</div>
				<div class="circle">
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
				</div>
			</div>
			<div class="accordion-content">
				<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
			</div>
		</div>
		<div class="accordion-item">
			<div class="accordion-header">
			<div class="box5">
				<span class="price">¥ 5,000</span><span class="unit">/月</span>
				</div>
				<div class="circle">
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
				</div>
			</div>
			<div class="accordion-content">
				<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
			</div>
		</div>
	</div>

</div>



<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
// Get all the accordion items
const accordionItems = document.querySelectorAll('.accordion-item');

// Add click event listeners to all accordion headers
accordionItems.forEach(function(item) {
  const header = item.querySelector('.accordion-header');
  const content = item.querySelector('.accordion-content');
  const iconPlus = item.querySelector('.fa-plus');
  const iconMinus = item.querySelector('.fa-minus');
  
  // Hide the minus icon by default
  iconMinus.style.display = 'none';
  
  header.addEventListener('click', function() {
    // Toggle the display of the accordion content
    content.style.display = content.style.display === 'block' ? 'none' : 'block';
    // Change the icon based on the display style of the content
    iconPlus.style.display = content.style.display === 'block' ? 'none' : 'inline';
    iconMinus.style.display = content.style.display === 'block' ? 'inline' : 'none';
    header.classList.toggle('active', content.style.display === 'block');
  });
});
</script>