<div class="side">
				<h3> <a href=" {{ route('about') }} ">About Us</a> </h3>
				<ul>
                    
					<li>We focus on recording</li>

					<li>We are not easy to modify</li>

					<li>We offer the best</li>
                    
				</ul>
			</div>
<br>


<div class="side">
				<h3>Log rankings</h3>
				<ul>
                    @foreach($top10 as $t)
					<li><a target="_blank" href="{{ route('blog.content', ['id'=>$t->id]) }}">{{ $t->title }}</a> &nbsp;&nbsp; &nbsp; &nbsp;   <p>{{ $t->created_at }}</p></li>
                    @endforeach
				</ul>
			</div>
<br>

<div class="side">
				<h3>Recommended books</h3>
				<ul>
                  
					<li>
						<a target="_blank" href="https://baike.baidu.com/item/%E7%AB%A5%E5%B9%B4/7814164?fr=aladdin">《childhood》
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					  </li>

					<li><a target="_blank" href="https://baike.baidu.com/item/%E4%B8%89%E6%AF%9B%E6%B5%81%E6%B5%AA%E8%AE%B0%E5%85%A8%E9%9B%86/7332412?fr=aladdin">《Winter Of Three Hairs》
						&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;</a> 
					</li>


					<li><a target="_blank" href="https://baike.baidu.com/item/%E9%B2%81%E6%BB%A8%E9%80%8A%E6%BC%82%E6%B5%81%E8%AE%B0/1018994">《Cast Away》
						&nbsp;&nbsp;&nbsp;&nbsp;</a> 
					</li>
                    
				</ul>
			</div>

<br>


<div class="side">
				<h3>Three sentences a day</h3>
				<ul>
                    
					<li>
						<a target="_blank" href="#">Time is the most precious wealth of all wealth</a> &nbsp;&nbsp; &nbsp; &nbsp;
					</li>

					<li>
						<a target="_blank" href="#">Friendship is a tree that can be sheltered</a> &nbsp;&nbsp; &nbsp; &nbsp;
					</li>


					<li>
						<a target="_blank" href="#">Who won't rest, no one will work</a> &nbsp;&nbsp; &nbsp; &nbsp;
					</li>
					
				</ul>
			</div>
			
