<footer class="footer">
    <span class="todo-count"><?= count(array_filter($todos, function($todo) { return $todo['completed'] === "false"; })) ?> item<?= "".count($todos) !== 1 ? "s" : "" ?> left</span>
    
    <form action="todos/clear-completed" method="post">
    <button class="clear-completed" onclick="submit();">Clear completed</button>
    </form>
</footer>

</main>

<footer class="site-footer">
    <div class="small-container">
        <p class="text-center">Made by <a href="#">Your Name Here</a></p>
    </div>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>